<?php if (!defined('basePath')) exit('No direct script access allowed'); ?>

<?=$this->form->getForm('add',$sqltable,$params,$formName='newsletter',$submitValue='Add new email',true);?>