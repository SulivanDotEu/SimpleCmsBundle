<?php

namespace Walva\SimpleCmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Entity\CountryStrategyDeliverer;
use Walva\SimpleCmsBundle\Form\CountryStrategyDelivererType;

/**
 * CountryStrategyDeliverer controller.
 *
 * @Route("/admin/cms/strategy/country")
 */
class CountryStrategyDelivererController extends Controller
{

    function __construct()
    {
        $this->setRoutes(
            array(
                self::$ROUTE_INDEX_ADD => 'walva_simplecms_strategy_country_new',
                self::$ROUTE_INDEX_INDEX => 'walva_simplecms_strategy_country',
                self::$ROUTE_INDEX_DELETE => 'walva_simplecms_strategy_country_show',
                self::$ROUTE_INDEX_EDIT => 'walva_simplecms_strategy_country_edit',
                self::$ROUTE_INDEX_SHOW => 'walva_simplecms_strategy_country_show',
            )
        );

        $this->setLayoutPath('WalvaSimpleCmsBundle:CountryStrategyDeliverer:layout.html.twig');
        $this->setIndexPath("WalvaSimpleCmsBundle:CountryStrategyDeliverer:index.html.twig");
        $this->setShowPath("WalvaSimpleCmsBundle:CountryStrategyDeliverer:show.html.twig");
        $this->setEditPath("WalvaSimpleCmsBundle:CountryStrategyDeliverer:edit.html.twig");
        $this->setNewPath("WalvaSimpleCmsBundle:CountryStrategyDeliverer:new.html.twig");

        $this->setColumnsHeader(
            array(
                "Id",
            )
        );
    }

    public function createEntity()
    {
        return new CountryStrategyDeliverer();
    }

    public function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('WalvaSimpleCmsBundle:CountryStrategyDeliverer');
    }

    /**
     * Lists all CountryStrategyDeliverer entities.
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
     * Creates a new CountryStrategyDeliverer entity.
     *
     * @Route("/", name="walva_simplecms_strategy_country_create")
     * @Method("POST")
     * @Template("WalvaSimpleCmsBundle:CountryStrategyDeliverer:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
     * Creates a form to create a CountryStrategyDeliverer entity.
     *
     * @param CountryStrategyDeliverer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(CountryStrategyDeliverer $entity)
    {
        $form = $this->createForm(
            new CountryStrategyDelivererType(),
            $entity,
            array(
                'action' => $this->generateUrl('walva_simplecms_strategy_country_create'),
                'method' => 'POST',
            )
        );

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
     * Displays a form to create a new CountryStrategyDeliverer entity.
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
     * Finds and displays a CountryStrategyDeliverer entity.
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
     * Displays a form to edit an existing CountryStrategyDeliverer entity.
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
     * Creates a form to edit a CountryStrategyDeliverer entity.
     *
     * @param CountryStrategyDeliverer $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(CountryStrategyDeliverer $entity)
    {
        $form = $this->createForm(
            new CountryStrategyDelivererType(),
            $entity,
            array(
                'action' => $this->generateUrl(
                        'walva_simplecms_strategy_country_update',
                        array('id' => $entity->getId())
                    ),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing CountryStrategyDeliverer entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_country_update")
     * @Method("PUT")
     * @Template("WalvaSimpleCmsBundle:CountryStrategyDeliverer:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }

    /**
     * Deletes a CountryStrategyDeliverer entity.
     *
     * @Route("/{id}", name="walva_simplecms_strategy_country_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a CountryStrategyDeliverer entity by id.
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
            ->getForm();
    }
}
