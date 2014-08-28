<?php

namespace Walva\SimpleCmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Entity\CountryStrategy;
use Walva\SimpleCmsBundle\Form\CountryStrategyType;

/**
 * CountryStrategy controller.
 *
 * @Route("/admin/cms/strategy/country")
 */
class CountryStrategyController extends Controller
{

function __construct() {
    $this->setRoutes(array(
        self::$ROUTE_INDEX_ADD => 'walva_simplecms_strategy_country_new',
        self::$ROUTE_INDEX_INDEX => 'walva_simplecms_strategy_country',
        self::$ROUTE_INDEX_DELETE => 'walva_simplecms_strategy_country_show',
        self::$ROUTE_INDEX_EDIT => 'walva_simplecms_strategy_country_edit',
        self::$ROUTE_INDEX_SHOW => 'walva_simplecms_strategy_country_show',
    ));

    $this->setLayoutPath('WalvaSimpleCmsBundle:CountryStrategy:layout.html.twig');
    $this->setIndexPath("WalvaSimpleCmsBundle:CountryStrategy:index.html.twig");
    $this->setShowPath("WalvaSimpleCmsBundle:CountryStrategy:show.html.twig");
    $this->setEditPath("WalvaSimpleCmsBundle:CountryStrategy:edit.html.twig");
    $this->setNewPath("WalvaSimpleCmsBundle:CountryStrategy:new.html.twig");

    $this->setColumnsHeader(array(
        "Id",
        ));
}

public function createEntity() {
        return new CountryStrategy();
    }

public function getRepository() {
        $em = $this->getDoctrine()->getManager();
        return $em->getRepository('WalvaSimpleCmsBundle:CountryStrategy');
    }

    /**
     * Lists all CountryStrategy entities.
     *
     * @Route("/", name="walva_simplecms_strategy_country")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }
    /**
     * Creates a new CountryStrategy entity.
     *
     * @Route("/", name="walva_simplecms_strategy_country_create")
     * @Method("POST")
     * @Template("WalvaSimpleCmsBundle:CountryStrategy:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
    * Creates a form to create a CountryStrategy entity.
    *
    * @param CountryStrategy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createCreateForm(CountryStrategy $entity)
    {
        $form = $this->createForm(new CountryStrategyType(), $entity, array(
            'action' => $this->generateUrl('walva_simplecms_strategy_country_create'),
            'method' => 'POST',
        ));

//        $form->add('submit', 'submit', array('label' => 'Create'));

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
     * Displays a form to create a new CountryStrategy entity.
     *
     * @Route("/new", name="walva_simplecms_strategy_country_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a CountryStrategy entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_country_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing CountryStrategy entity.
     *
     * @Route("/{id}/edit", name="walva_simplecms_strategy_country_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
    * Creates a form to edit a CountryStrategy entity.
    *
    * @param CountryStrategy $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    public function createEditForm(CountryStrategy $entity)
    {
        $form = $this->createForm(new CountryStrategyType(), $entity, array(
            'action' => $this->generateUrl('walva_simplecms_strategy_country_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

//        $form->add('submit', 'submit', array('label' => 'Update'));
        $form->add(
            'submit',
            'submit',
            array(
                'label' => 'Update',
                'attr' => array(
                    'class' => 'btn btn-primary',
                ),
            )
        );

        return $form;
    }
    /**
     * Edits an existing CountryStrategy entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_country_update")
     * @Method("PUT")
     * @Template("WalvaSimpleCmsBundle:CountryStrategy:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }
    /**
     * Deletes a CountryStrategy entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_country_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a CountryStrategy entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('walva_simplecms_strategy_country_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
