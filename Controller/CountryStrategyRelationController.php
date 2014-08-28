<?php

namespace Walva\SimpleCmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Entity\CountryStrategyRelation;
use Walva\SimpleCmsBundle\Form\CountryStrategyRelationType;

/**
 * CountryStrategyRelation controller.
 *
 * @Route("/admin/cms/strategy/relation/country")
 */
class CountryStrategyRelationController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'strategy_country_relation_new',
        self::$ROUTE_INDEX_INDEX => 'strategy_country_relation',
        self::$ROUTE_INDEX_DELETE => 'strategy_country_relation_show',
        self::$ROUTE_INDEX_EDIT => 'strategy_country_relation_edit',
        self::$ROUTE_INDEX_SHOW => 'strategy_country_relation_show',
    ));

    $this->setLayoutPath('WalvaSimpleCmsBundle:CountryStrategyRelation:layout.html.twig');
    $this->setIndexPath("WalvaSimpleCmsBundle:CountryStrategyRelation:index.html.twig");
    $this->setShowPath("WalvaSimpleCmsBundle:CountryStrategyRelation:show.html.twig");
    $this->setEditPath("WalvaSimpleCmsBundle:CountryStrategyRelation:edit.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new CountryStrategyRelation();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaSimpleCmsBundle:CountryStrategyRelation');
    }

    /**
     * Lists all CountryStrategyRelation entities.
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
     * Creates a new CountryStrategyRelation entity.
     *
     * @Route("/", name="strategy_country_relation_create")
     * @Method("POST")
     * @Template("WalvaSimpleCmsBundle:CountryStrategyRelation:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a CountryStrategyRelation entity.
    *
    * @param CountryStrategyRelation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(CountryStrategyRelation $entity)
    {
        $form = $this->createForm(new CountryStrategyRelationType(), $entity, array(
            'action' => $this->generateUrl('strategy_country_relation_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CountryStrategyRelation entity.
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
     * Finds and displays a CountryStrategyRelation entity.
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
     * Displays a form to edit an existing CountryStrategyRelation entity.
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
    * Creates a form to edit a CountryStrategyRelation entity.
    *
    * @param CountryStrategyRelation $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(CountryStrategyRelation $entity)
    {
        $form = $this->createForm(new CountryStrategyRelationType(), $entity, array(
            'action' => $this->generateUrl('strategy_country_relation_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CountryStrategyRelation entity.
     *
     * @Route("/{id}", name="strategy_country_relation_update")
     * @Method("PUT")
     * @Template("WalvaSimpleCmsBundle:CountryStrategyRelation:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a CountryStrategyRelation entity.
     *
     * @Route("/{id}", name="strategy_country_relation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a CountryStrategyRelation entity by id.
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
