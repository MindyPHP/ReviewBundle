<?php

/*
 * This file is part of Mindy Framework.
 * (c) 2017 Maxim Falaleev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Mindy\Bundle\ReviewBundle\Controller;

use Mindy\Bundle\MindyBundle\Controller\Controller;
use Mindy\Bundle\ReviewBundle\Form\ReviewForm;
use Mindy\Bundle\ReviewBundle\Model\Review;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller
{
    public function listAction(Request $request)
    {
        $qs = Review::objects()->published();
        $pager = $this->createPagination($qs);

        $review = new Review();
        $form = $this->createForm(ReviewForm::class, $review, [
            'method' => 'POST',
            'action' => $this->generateUrl('review_list'),
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Review $review */
            $review = $form->getData();

            if (false === $review->save()) {
                throw new \RuntimeException('Fail to save review');
            }

            $this->addFlash('success', 'Ваш отзыв отправлен. Отзыв будет опубликован после проверки модератором.');

            return $this->redirect($request->getRequestUri());
        }

        return $this->render('review/list.html', [
            'reviews' => $pager->paginate(),
            'pager' => $pager->createView(),
            'form' => $form->createView(),
        ]);
    }
}
