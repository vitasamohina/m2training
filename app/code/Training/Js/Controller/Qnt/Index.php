<?php

declare(strict_types=1);

namespace Training\Js\Controller\Qnt;

class Index extends \Magento\Framework\App\Action\Action
{

    private $resultJsonFactory;

    private $productRepository;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
         \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->productRepository = $productRepository;
    }

    public function execute()
    {
        if (isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];
        }else{
            $productId = 1;
        }

        $result = $this->resultJsonFactory->create();

        $result->setData(json_encode($this->getQnt($productId)));
        return $result;


    }
    private function getQnt($productId)
    {
        $productModel = $this->productRepository->getById($productId);

        $qnt =  $productModel->getQuantityAndStockStatus()['qty'];
        return $qnt;
    }

}
