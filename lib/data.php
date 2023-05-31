<?php

$data        = Axe\Core\Content::getFields();
$post        = Axe\Core\Content::getPosts();
$options     = Axe\Core\Content::getOptions();
$mainOptions = (new \Axe\Core\Network)->getMainSite()['options'];
