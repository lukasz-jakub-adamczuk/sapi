<?php

namespace RenaissanceBundle\Controller;

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

    // cmd+alt+v
    // cmd+alt+n
    // cmd+shift+o
    // cmd+shif+a
    // alt+enter

    public function archiveAction()
    {
        $queryBuilder = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n, COUNT(n.idNews) items, YEAR(n.creationDate) year')
            ->from('AppBundle:News', 'n')
            ->groupBy('year');

        $news = $queryBuilder->getQuery()->getArrayResult();

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
            'news' => $news,
            'params' => [
                'year' => $year
            ]
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
            'news' => $news,
            'params' => [
                'year' => $year,
                'month' => $month
            ]
        ]);
    }

    public function showAction($year, $month, $day, $title)
    {
        $date = implode('-', [$year, $month, $day]);

        $queryBuilder = $this->getDoctrine()->getEntityManager()->createQueryBuilder();

        $queryBuilder->select('n')
            ->from('AppBundle:News', 'n')
            ->where('DATE(n.creationDate)=:date', 'n.slug=:slug')
            ->setParameter(':date', $date)
            ->setParameter(':slug', $title);

        $news = $queryBuilder->getQuery()->getSingleResult();

        if (is_null($news)) {
            throw $this->createNotFoundException('News not found');
        }


        return $this->render('RenaissanceBundle:News:show.html.twig', [
            'news' => $news,
            'params' => [
                'year' => $year,
                'month' => $month,
                'day' => $day,
                'title' => $title
            ]
        ]);
    }

}
