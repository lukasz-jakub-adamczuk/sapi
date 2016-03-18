<?php

namespace RenaissanceBundle\Controller;

use Core\Service\NewsProvider;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\News;

class NewsController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:News');

        $news = $repository->findAll();

        return $this->render('RenaissanceBundle:News:index.html.twig', [
            'news' => $news
        ]);
    }

    public function archiveAction()
    {
        $provider = $this->get('renaissance.service.news');
        $news = $provider->getNewsArchive();

        return $this->render('RenaissanceBundle:News:archive.html.twig', [
            'news' => $news
        ]);
    }

    public function archiveByYearAction($year)
    {
        $queryBuilder = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')
            ->from('AppBundle:News', 'n')
            ->where('YEAR(n.creationDate)=:year')
            ->groupBy('month')
            ->setParameter(':year', $year);

        $news = $queryBuilder->getQuery()->getArrayResult();

        return $this->render('RenaissanceBundle:News:archiveByYear.html.twig', [
            'news' => $news
        ]);
    }

    public function archiveByYearAndMonthAction($year, $month)
    {
        $queryBuilder = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year, MONTH(n.creationDate) month')
            ->from('AppBundle:News', 'n')
            ->where('YEAR(n.creationDate)=:year', 'MONTH(n.creationDate)=:month')
            ->groupBy('n.idNews')
            ->setParameter(':year', $year)
            ->setParameter(':month', $month);

        $news = $queryBuilder->getQuery()->getArrayResult();

        return $this->render('RenaissanceBundle:News:archiveByYearAndMonth.html.twig', [
            'news' => $news
        ]);
    }

    public function showAction($year, $month, $day, $title)
    {
        $repository = $this->getDoctrine()->getRepository('AppBundle:News');

        $date = implode('-', [$year, $month, $day]);
        // echo $date;

        $criteria = [
            // 'idNews' => 1
            // 'creationDate' => $date,
            'creationDate' => new \DateTime($date),
            'slug' => $title
        ];

        $news = $repository->findOneBy($criteria);
        // $news = $repository->findOneByIdNews($id);

        $queryBuilder = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n')
            ->from('AppBundle:News', 'n')
            // ->innerJoin('a.category', 'ac')
            ->where('DATE(n.creationDate)=:date', 'n.slug=:slug')
            ->setParameter(':date', $date)
            ->setParameter(':slug', $title);

        $news = $queryBuilder->getQuery()->getSingleResult();

        if (is_null($news)) {
            throw $this->createNotFoundException('News not found');
        }


        return $this->render('RenaissanceBundle:News:show.html.twig', [
            'news' => $news
        ]);
    }

}
