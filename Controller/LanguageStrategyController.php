<?php

namespace Walva\SimpleCmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Entity\LanguageStrategy;
use Walva\SimpleCmsBundle\Form\LanguageStrategyType;

/**
 * LanguageStrategy controller.
 *
 * @Route("/strategy/language")
 */
class LanguageStrategyController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'walva_simplecms_strategy_language_new',
        self::$ROUTE_INDEX_INDEX => 'walva_simplecms_strategy_language',
        self::$ROUTE_INDEX_DELETE => 'walva_simplecms_strategy_language_show',
        self::$ROUTE_INDEX_EDIT => 'walva_simplecms_strategy_language_edit',
        self::$ROUTE_INDEX_SHOW => 'walva_simplecms_strategy_language_show',
    ));

    $this->setLayoutPath('WalvaSimpleCmsBundle:LanguageStrategy:layout.html.twig');
    $this->setIndexPath("WalvaSimpleCmsBundle:LanguageStrategy:index.html.twig");
    $this->setShowPath("WalvaSimpleCmsBundle:LanguageStrategy:show.html.twig");
    $this->setEditPath("WalvaSimpleCmsBundle:LanguageStrategy:edit.html.twig");
    $this->setNewPath("WalvaSimpleCmsBundle:LanguageStrategy:new.html.twig");


    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new LanguageStrategy();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaSimpleCmsBundle:LanguageStrategy');
    }

    /**
     * Lists all LanguageStrategy entities.
     *
     * @Route("/", name="walva_simplecms_strategy_language")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new LanguageStrategy entity.
     *
     * @Route("/", name="walva_simplecms_strategy_language_create")
     * @Method("POST")
     * @Template("WalvaSimpleCmsBundle:LanguageStrategy:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a LanguageStrategy entity.
    *
    * @param LanguageStrategy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(LanguageStrategy $entity)
    {
        $form = $this->createForm(new LanguageStrategyType(), $entity, array(
            'action' => $this->generateUrl('walva_simplecms_strategy_language_create'),
            'method' => 'POST',
        ));

        $form->add(
            'submit',
            'submit',
            array(
                'label' => 'Create',
                'attr' => array(
                    'class' => 'btn btn-primary',
                ),
            )
        );

        return $form;
    }

    /**
     * Displays a form to create a new LanguageStrategy entity.
     *
     * @Route("/new", name="walva_simplecms_strategy_language_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a LanguageStrategy entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_language_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing LanguageStrategy entity.
     *
     * @Route("/{id}/edit", name="walva_simplecms_strategy_language_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a LanguageStrategy entity.
    *
    * @param LanguageStrategy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(LanguageStrategy $entity)
    {
        $form = $this->createForm(new LanguageStrategyType(), $entity, array(
            'action' => $this->generateUrl('walva_simplecms_strategy_language_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LanguageStrategy entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_language_update")
     * @Method("PUT")
     * @Template("WalvaSimpleCmsBundle:LanguageStrategy:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a LanguageStrategy entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_language_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a LanguageStrategy entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('walva_simplecms_strategy_language_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
