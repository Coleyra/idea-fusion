<?php

namespace IdeaFusion\Bundle\CoreBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CoreController extends Controller
{
	/**
	* This action handles index.
	*
	* @Route("/", name="index")
	* @Method({ "GET", "POST" }) 
	* @Template()
	*/
	public function indexAction(Request $request)
	{
		return array();
	}
}