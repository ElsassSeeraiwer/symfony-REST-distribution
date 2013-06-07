<?php

namespace ElsassSeeraiwer\RestBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use ElsassSeeraiwer\ESDemoBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UsersController extends FOSRestController
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Renvoie la liste des utilisateurs"
     * )
     *
     * @Rest\View
     */
    public function getUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('ElsassSeeraiwerESDemoBundle:User')->findAll();

        return array(
            'users' => $entities
        );
    } // "get_users"     [GET] /users

    /**
     * @ApiDoc(
     *  description="Renvoie l'utilisateur par son nom d'utilisateur"
     * )
     *
     * @Rest\View
     */
    public function getUserAction($username)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('ElsassSeeraiwerESDemoBundle:User')->findOneByUsername($username);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find user entity');
        }

        return $entity;
    } // "get_user"      [GET] /users/{username}
}
