<?php

namespace IdeaFusion\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use IdeaFusion\Bundle\CoreBundle\Entity\Idea;
use IdeaFusion\Bundle\CoreBundle\Entity\Solution;
use IdeaFusion\Bundle\CoreBundle\Form\SolutionType;

/** 
 * @Route("/solution")
 */
class SolutionController extends Controller
{
	/**
	 * @Route("/create/{id_idea}", requirements={"id_idea" = "\d+"}, name="solution_create")
	 * @Template()
	 * @ParamConverter("idea", class="IdeaFusionCoreBundle:Idea")
	 * 
	 * @author Florian Mahieu
	 * Create Idea Page
	 */
	public function createAction(Request $request, Idea $idea)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$session = $request->getSession();

		$solution = new Solution();
		
		$form = $this->createForm(new SolutionType(), $solution);

		if( 'POST' === $request->getMethod() )
		{
			$form->bindRequest($request);
			if( $form->isValid() )
			{
				$solution->setIdea($idea);
				$em->persist($solution);
				$em->flush();
				return $this->redirect($this->generateUrl('index'));
			}
		}

		return array(
				'form' => $form->createView(),
				'idea' => $idea
		);
	}
}