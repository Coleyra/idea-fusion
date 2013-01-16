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
use IdeaFusion\Bundle\CoreBundle\Entity\Vote;
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
		$user = $this->container->get('security.context')->getToken()->getUser();

		$solution = new Solution();
		
		$form = $this->createForm(new SolutionType(), $solution);

		if( 'POST' === $request->getMethod() )
		{
			$form->bindRequest($request);
			if( $form->isValid() )
			{
				$solution->setIdea($idea);
				$solution->setUser($user);
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
	
	/**
	 * @Route("/vote/{id_solution}/{point}", requirements={"id_solution" = "\d+"}, name="solution_vote")
	 * @Template()
	 * @ParamConverter("solution", class="IdeaFusionCoreBundle:Solution")
	 * 
	 * @author Florian Mahieu
	 * Create Idea Page
	 */
	public function voteAction(Request $request, Solution $solution, $point)
	{
		$em = $this->getDoctrine()->getEntityManager();
		$user = $this->container->get('security.context')->getToken()->getUser();

		$vote = new Vote();
		$vote->setUser($user);
		$vote->setSolution($solution);
		$vote->setPoint($point);

		$em->persist($vote);
		try
		{
			$em->flush();
			$this->get('session')->setFlash('success', 'Vote added');
		}
		catch(\Exception $e)
		{
			$this->get('session')->setFlash('notice', 'You already vote for this solution');
		}
		return $this->redirect($this->generateUrl('index'));
	}
}