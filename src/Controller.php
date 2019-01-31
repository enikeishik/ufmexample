<?php
/**
 * UFO Framework Stub module.
 * 
 * @copyright   Copyright (C) 2018 - 2019 Enikeishik <enikeishik@gmail.com>. All rights reserved.
 * @author      Enikeishik <enikeishik@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ufo\Modules\Enikeishik\Ufmexample;

use Ufo\Core\Result;
use Ufo\Core\Section;
use Ufo\Modules\Controller as BaseController;
use Ufo\Modules\ModelInterface;
use Ufo\Modules\Parameter;
use Ufo\Modules\View;
use Ufo\Modules\ViewInterface;

class Controller extends BaseController
{
    /**
     * @see parent
     */
    public function compose(Section $section = null): Result
    {
        $this->initParams();
        $this->setParams($section->params);
        $this->container->set('params', $this->params);
        
        if ($this->params['isAction']->value) {
            $model = $this->getModel();
            $model->makeAction();
            return $this->app->getError(
                302, 
                'Moved Temporarily', 
                ['location' => $this->app->getPath()]
            );
        }
        
        $this->valudateParams();
        
        return parent::compose($section);
    }
    
    /**
     * @return void
     */
    protected valudateParams(): void
    {
        switch ($this->params['filter']->value) {
            case 'marked':
            case 'unmarked':
            case '':
                break;
            default:
                $this->params['filter']->value = '';
        }
    }
    
    /**
     * @see parent
     */
    protected function initParams(): void
    {
        parent::initParams();
        $this->addParam(Parameter::makeString('filter', '', 'path', false, ''));
        $this->addParam(Parameter::makeBool('isAction', 'action', 'path', false, false));
    }
    
    /**
     * @see parent
     */
    protected function setDataFromModel(ModelInterface $model): void
    {
        if (0 != $this->params['itemId']->value) {
            $this->data['item'] = $model->getItem();
            return;
        }
        
        $this->data['items'] = $model->getItems();
    }
    
    /**
     * @see parent
     */
    protected function getModel(): ModelInterface
    {
        $model = new Model();
        $model->inject($this->container);
        return $model;
    }
    
    /**
     * @see parent
     */
    protected function getView(): ViewInterface
    {
        $view = new View(
            0 != $this->params['itemId']->value ? 'item' : 'index', 
            $this->data
        );
        $view->inject($this->container);
        return $view;
    }
}
