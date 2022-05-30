<?php

namespace Testing\Assignment\Controller\Index;

use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Config\Storage\WriterInterface;
class Form extends \Magento\Framework\App\Action\Action
{
	/**
	* @var resultPageFactory
	*/
    protected $resultPageFactory;
	/**
     * InfoBox constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param ScopeConfigInterface $scopeConfig
	 * @param WriterInterface $configWriter
     */
	 public function __construct(
		\Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
		WriterInterface $configWriter
    ) {
        $this->resultPageFactory = $resultPageFactory;        
        $this->_scopeConfig = $scopeConfig;
		$this->configWriter = $configWriter;
        parent::__construct($context);
    }

    public function execute()
    {
        
        $post = (array) $this->getRequest()->getPost(); //get post request for form data
		if (!empty($post)) {
            // Retrieve form data
            $livechat_license_number   = $post['livechat_license_number'];
            $livechat_groups           = $post['livechat_groups'];
            $livechat_params           = $post['livechat_params'];
			// Save fields via configWriter
			$this->configWriter->save('livechat/general/license', $livechat_license_number); 
			$this->configWriter->save('livechat/advanced/group',  $livechat_groups);
			$this->configWriter->save('livechat/advanced/params', $livechat_params);
			// To display the submission message
            $this->messageManager->addSuccessMessage('Form Submitted!!');

            // Redirect to form page 
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('assignment/index/form'); 

            return $resultRedirect;
        }
        $this->_view->loadLayout();
        $this->_view->renderLayout();
    } 
}