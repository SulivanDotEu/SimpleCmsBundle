<?php

namespace Walva\SimpleCmsBundle\Controller;

use JMS\DiExtraBundle\Annotation\Inject;
use Symfony\Component\HttpFoundation\Request;
use \Walva\CrudAdminBundle\Controller\CrudController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Walva\SimpleCmsBundle\Entity\Document;
use Walva\SimpleCmsBundle\Form\DocumentType;

/**
 * Document controller.
 *
 * @Route("/document")
 */
class DocumentController extends Controller
{

	/**
	 * This var contains the content form type in order to custom
	 * the behavior of the content treatment.
	 * e.g. : you can use HTML Purifier in order to clean javascript and form
	 *          of all content of the cms.
	 *
	 * @var string
	 * @Inject("%walva.cms.content_form_type%")
	 */
	private $_contentFormType = "text";

    function __construct()
    {
        $this->setRoutes(
            array(
                self::$ROUTE_INDEX_ADD => 'walva_simplecms_document_new',
                self::$ROUTE_INDEX_INDEX => 'walva_simplecms_document',
                self::$ROUTE_INDEX_DELETE => 'walva_simplecms_document_delete',
                self::$ROUTE_INDEX_EDIT => 'walva_simplecms_document_edit',
                self::$ROUTE_INDEX_SHOW => 'walva_simplecms_document_show',
            )
        );

        $this->setLayoutPath('WalvaSimpleCmsBundle:Document:layout.html.twig');
        $this->setIndexPath("WalvaSimpleCmsBundle:Document:index.html.twig");
        $this->setShowPath("WalvaSimpleCmsBundle:Document:show.html.twig");
        $this->setEditPath("WalvaSimpleCmsBundle:Document:edit.html.twig");
        $this->setNewPath("WalvaSimpleCmsBundle:Document:new.html.twig");

        $this->setColumnsHeader(
            array(
                "Id",
            )
        );
    }

    public function createEntity()
    {
        return new Document();
    }

    public function getRepository()
    {
        $em = $this->getDoctrine()->getManager();

        return $em->getRepository('WalvaSimpleCmsBundle:Document');
    }

    /**
     * Lists all Document entities.
     *
     * @Route("/", name="walva_simplecms_document")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return parent::indexAction();

    }

    /**
     * Creates a new Document entity.
     *
     * @Route("/", name="walva_simplecms_document_create")
     * @Method("POST")
     * @Template("WalvaSimpleCmsBundle:Document:new.html.twig")
     */
    public function createAction(Request $request)
    {
        return parent::createAction($request);

    }

    /**
     * Creates a form to create a Document entity.
     *
     * @param Document $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createCreateForm(Document $entity)
    {
        $form = $this->createForm(
            new DocumentType($this->_contentFormType),
            $entity,
            array(
                'action' => $this->generateUrl('walva_simplecms_document_create'),
                'method' => 'POST',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Document entity.
     *
     * @Route("/new", name="walva_simplecms_document_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        return parent::newAction();

    }

    /**
     * Finds and displays a Document entity.
     *
     * @Route("/{id}", name="walva_simplecms_document_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        return parent::showAction($id);

    }

    /**
     * Displays a form to edit an existing Document entity.
     *
     * @Route("/{id}/edit", name="walva_simplecms_document_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        return parent::editAction($id);

    }

    /**
     * Creates a form to edit a Document entity.
     *
     * @param Document $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createEditForm(Document $entity)
    {
        $form = $this->createForm(
            new DocumentType($this->_contentFormType),
            $entity,
            array(
                'action' => $this->generateUrl('walva_simplecms_document_update', array('id' => $entity->getId())),
                'method' => 'PUT',
            )
        );

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Document entity.
     *
     * @Route("/{id}", name="walva_simplecms_document_update")
     * @Method("PUT")
     * @Template("WalvaSimpleCmsBundle:Document:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        return parent::updateAction($request, $id);

    }

    /**
     * Deletes a Document entity.
     *
     * @Route("/{id}", name="walva_simplecms_document_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        return parent::deleteAction($request, $id);

    }

    /**
     * Creates a form to delete a Document entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    public function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('walva_simplecms_document_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
