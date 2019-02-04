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

class WidgetController extends BaseController
{
    /**
     * @see parent
     */
    public function compose(Section $section = null): Result
    {
        $model = $this->getModel();
        $widget = $this->container->widget;
        
        $filter = '';
        if (!empty($widget->params['filter'])) {
            if ('marked' == $widget->params['filter'] 
            || 'unmarked' == $widget->params['filter']) {
                $filter = $widget->params['filter'];
            }
        }
        $this->data['items'] = $model->getItems($filter);
        
        return new Result($this->getView());
    }
    
    /**
     * @see parent
     */
    protected function getModelObject(): ModelInterface
    {
        return new WidgetModel();
    }
}
