<?php

namespace IdeaFusion\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use IdeaFusion\Bundle\CoreBundle\Entity\Idea;
use IdeaFusion\Bundle\CoreBundle\Form\IdeaType;

/** 
 * @Route("/idea")
 */
class IdeaController extends Controller
{
	/**
	 * @Route("/create", name="idea_create")
	 * @Template()
	 * 
	 * @author Florian Mahieu
	 * Create Idea Page
	 */
	public function createAction(Request $request)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$user = $this->container->get('security.context')->getToken()->getUser();

		$idea = new Idea();
		
		$form = $this->createForm(new IdeaType(), $idea);

		if( 'POST' === $request->getMethod() )
		{
			$form->bindRequest($request);
			if( $form->isValid() )
			{
				$idea->setUser($user);
				$em->persist($idea);
				$em->flush();
				return $this->redirect($this->generateUrl('index'));
			}
		}

		return array(
				'form' => $form->createView()
		);
	}
}