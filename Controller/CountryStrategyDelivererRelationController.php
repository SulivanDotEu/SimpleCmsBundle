<?php

namespace Walva\SimpleCmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Entity\CountryStrategyDelivererRelation;
use Walva\SimpleCmsBundle\Form\CountryStrategyDelivererRelationType;

/**
 * CountryStrategyDelivererRelation controller.
 *
 * @Route("/strategy_country_relation")
 */
class CountryStrategyDelivererRelationController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'strategy_country_relation_new',
        self::$ROUTE_INDEX_INDEX => 'strategy_country_relation',
        self::$ROUTE_INDEX_DELETE => 'strategy_country_relation_show',
        self::$ROUTE_INDEX_EDIT => 'strategy_country_relation_edit',
        self::$ROUTE_INDEX_SHOW => 'strategy_country_relation_show',
    ));

    $this->setLayoutPath('WalvaSimpleCmsBundle:CountryStrategyDelivererRelation:layout.html.twig');
    $this->setIndexPath("WalvaSimpleCmsBundle:CountryStrategyDelivererRelation:index.html.twig");
    $this->setShowPath("WalvaSimpleCmsBundle:CountryStrategyDelivererRelation:show.html.twig");
    $this->setEditPath("WalvaSimpleCmsBundle:CountryStrategyDelivererRelation:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new CountryStrategyDelivererRelation();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaSimpleCmsBundle:CountryStrategyDelivererRelation');
    }

    /**
     * Lists all CountryStrategyDelivererRelation entities.
     *
     * @Route("/", name="strategy_country_relation")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new CountryStrategyDelivererRelation entity.
     *
     * @Route("/", name="strategy_country_relation_create")
     * @Method("POST")
     * @Template("WalvaSimpleCmsBundle:CountryStrategyDelivererRelation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a CountryStrategyDelivererRelation entity.
    *
    * @param CountryStrategyDelivererRelation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(CountryStrategyDelivererRelation $entity)
    {
        $form = $this->createForm(new CountryStrategyDelivererRelationType(), $entity, array(
            'action' => $this->generateUrl('strategy_country_relation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CountryStrategyDelivererRelation entity.
     *
     * @Route("/new", name="strategy_country_relation_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a CountryStrategyDelivererRelation entity.
     *
     * @Route("/{id}", name="strategy_country_relation_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing CountryStrategyDelivererRelation entity.
     *
     * @Route("/{id}/edit", name="strategy_country_relation_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a CountryStrategyDelivererRelation entity.
    *
    * @param CountryStrategyDelivererRelation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(CountryStrategyDelivererRelation $entity)
    {
        $form = $this->createForm(new CountryStrategyDelivererRelationType(), $entity, array(
            'action' => $this->generateUrl('strategy_country_relation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CountryStrategyDelivererRelation entity.
     *
     * @Route("/{id}", name="strategy_country_relation_update")
     * @Method("PUT")
     * @Template("WalvaSimpleCmsBundle:CountryStrategyDelivererRelation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a CountryStrategyDelivererRelation entity.
     *
     * @Route("/{id}", name="strategy_country_relation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a CountryStrategyDelivererRelation entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('strategy_country_relation_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
