<?php

namespace Training\Test\Plugin\Block;

class Template{

    public function afterToHtml(
        \Magento\Framework\View\Element\Template $subject,
                                                 $result
    ) {
        if ($subject->getNameInLayout() == 'top.search') {
            $result = '<div><p>' . $subject->getTemplate() . '</p>'
                . '<p>' . get_class($subject) . '</p>' . $result . '</div>';
            // var_dump($subject->getTemplate()); die;
        }
        return $result;
    }
}
