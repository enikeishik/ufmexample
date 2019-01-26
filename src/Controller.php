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
    protected function initParams(): void
    {
        parent::initParams();
        $this->params['isAction'] = Parameter::make('isAction', 'bool', 'action', 'path', false, false), 
    }
    
    /**
     * @see parent
     */
    public function compose(Section $section = null): Result
    {
        if ($this->params['isAction']) {
            $model = $this->getModel();
            $model->makeAction();
            return $this->app->getError(
                302, 
                'Moved Temporarily', 
                ['location' => $app->getPath()]
            );
        }
        
        return parent::compose($section);
    }
    
    /**
     * @see parent
     */
    protected function setDataFromModel(ModelInterface $model): void
    {
        if (0 != $this->params['itemId']) {
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
            0 != $this->params['itemId'] ? 'item' : 'index', 
            $this->data
        );
        $view->inject($this->container);
        return $view;
    }
}
