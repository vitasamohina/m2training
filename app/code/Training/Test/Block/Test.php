<?php
namespace Training\Test\Block;
class Test extends \Magento\Framework\View\Element\AbstractBlock
{
    public function toHtml()
    {
        return "<b>Hello world from block!</b>";
    }
}
