<?php
/**
 * UFO Framework Example module.
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
use Ufo\Modules\View;
use Ufo\Modules\ViewInterface;

class WidgetController extends BaseController
{
    /**
     * @see parent
     */
    public function compose(Section $section = null): Result
    {
        $model = $this->getModel();
        $this->data['items'] = $model->getItems();
        
        return new Result($this->getView());
    }
    
    /**
     * @see parent
     */
    protected function getModelObject(): ModelInterface
    {
        return new WidgetModel();
    }
    
    /**
     * @see parent
     */
    protected function getViewObject(): ViewInterface
    {
        return new View();
    }
}
