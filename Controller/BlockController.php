<?php

namespace Walva\SimpleCmsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Entity\Block;
use Walva\SimpleCmsBundle\Form\BlockType;

/**
 * Block controller.
 *
 * @Route("/block")
 */
class BlockController extends Controller
{

    function __construct()
    {
        $this->setRoutes(
            array(
                self::$ROUTE_INDEX_ADD => 'walva_simplecms_block_new',
                self::$ROUTE_INDEX_INDEX => 'walva_simplecms_block',
                self::$ROUTE_INDEX_DELETE => 'walva_simplecms_block_show',
                self::$ROUTE_INDEX_EDIT => 'walva_simplecms_block_edit',
                self::$ROUTE_INDEX_SHOW => 'walva_simplecms_block_show',
            )
        );

        $this->setLayoutPath('WalvaSimpleCmsBundle:Block:layout.html.twig');
        $this->setIndexPath("WalvaSimpleCmsBundle:Block:index.html.twig");
        $this->setShowPath("WalvaSimpleCmsBundle:Block:show.html.twig");
        $this->setEditPath("WalvaSimpleCmsBundle:Block:edit.html.twig");

        $this->setColumnsHeader(
            array(
                "Id",
            )
        );
    }

    public function createEntity()
    {
        return new Block();
    }

    public function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('WalvaSimpleCmsBundle:Block');
    }

    /**
     * Lists all Block entities.
     *
     * @Route("/", name="walva_simplecms_block")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }

    /**
     * Creates a new Block entity.
     *
     * @Route("/", name="walva_simplecms_block_create")
     * @Method("POST")
     * @Template("WalvaSimpleCmsBundle:Block:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = $this->createEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entity->setAuthor($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            return $this->redirect($this->generateUrl(
                    $this->getRouteShow(), array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Block entity.
     *
     * @param Block $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(Block $entity)
    {
        $form = $this->createForm(
            new BlockType(),
            $entity,
            array(
                'action' => $this->generateUrl('walva_simplecms_block_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Block entity.
     *
     * @Route("/new", name="walva_simplecms_block_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Block entity.
     *
     * @Route("/{id}", name="walva_simplecms_block_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Block entity.
     *
     * @Route("/{id}/edit", name="walva_simplecms_block_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
     * Creates a form to edit a Block entity.
     *
     * @param Block $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(Block $entity)
    {
        $form = $this->createForm(
            new BlockType(),
            $entity,
            array(
                'action' => $this->generateUrl('walva_simplecms_block_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Block entity.
     *
     * @Route("/{id}", name="walva_simplecms_block_update")
     * @Method("PUT")
     * @Template("WalvaSimpleCmsBundle:Block:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }

    /**
     * Deletes a Block entity.
     *
     * @Route("/{id}", name="walva_simplecms_block_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Block entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('walva_simplecms_block_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
