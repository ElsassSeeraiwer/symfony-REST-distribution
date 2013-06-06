<?php

namespace ElsassSeeraiwer\RestBundle\Controller;

//use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use FOS\RestBundle\Controller\FOSRestController;
//use FOS\RestBundle\Controller\Annotations as Rest;
use ElsassSeeraiwer\ESDemoBundle\Entity\User;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class UsersController extends FOSRestController
{
    public function optionsUsersAction()
    {} // "options_users" [OPTIONS] /users

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Renvois la liste des utilisateurs"
     * )
     */
    public function getUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('ElsassSeeraiwerESDemoBundle:User')->findAll();

        $view = $this->view($data, 200)
            ->setTemplateVar('users')
        ;

        return $this->handleView($view);
    } // "get_users"     [GET] /users

    public function newUsersAction()
    {} // "new_users"     [GET] /users/new

    public function postUsersAction()
    {} // "post_users"    [POST] /users

    public function patchUsersAction()
    {} // "patch_users"   [PATCH] /users

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Renvois l'utilisateur par son id"
     * )
     */
    public function getUserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('ElsassSeeraiwerESDemoBundle:User')->find($id);

        $view = $this->view($data, 200)
            ->setTemplateVar('users')
        ;

        return $this->handleView($view);
    } // "get_user"      [GET] /users/{slug}

    public function editUserAction($slug)
    {} // "edit_user"     [GET] /users/{slug}/edit

    public function putUserAction($slug)
    {} // "put_user"      [PUT] /users/{slug}

    public function patchUserAction($slug)
    {} // "patch_user"    [PATCH] /users/{slug}

    public function lockUserAction($slug)
    {} // "lock_user"     [PATCH] /users/{slug}/lock

    public function banUserAction($slug)
    {} // "ban_user"      [PATCH] /users/{slug}/ban

    public function removeUserAction($slug)
    {} // "remove_user"   [GET] /users/{slug}/remove

    public function deleteUserAction($slug)
    {} // "delete_user"   [DELETE] /users/{slug}
}
