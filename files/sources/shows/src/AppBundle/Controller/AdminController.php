<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Forms\ShowType;
use AppBundle\Entity\TVShow;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route("/addShow", name="admin_add_show")
     * @Template()
     */
    public function addShowAction(Request $request)
    {
    	$show = new TVShow;
    	$form = $this->createForm(ShowType::class, $show);
    	$success = false;

		$form->handleRequest($request);
    	if ($form->isSubmitted() && $form->isValid()) {
    		$file = $show->getImage();
    		if ($file) {
    			$filename = md5(uniqid()).'.'.$file->guessExtension();
    			$webRoot = $this->get('kernel')->getRootDir().'/../web';

    			$file->move($webRoot . '/uploads', $filename);
    			$show->setImage($filename);
    		}

    		$em = $this->get('doctrine')->getManager();
    		$em->persist($show);
    		$em->flush();
    		$success = true;
    	}

        return [
        	'form' => $form->createView(),
        	'success' => $success
        ];
    }
}
