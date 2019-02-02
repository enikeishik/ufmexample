<?php
/**
 * UFO Framework Example module.
 * 
 * @copyright   Copyright (C) 2018 - 2019 Enikeishik <enikeishik@gmail.com>. All rights reserved.
 * @author      Enikeishik <enikeishik@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ufo\Modules\Enikeishik\Ufmexample;

use Ufo\Modules\Model as BaseModel;

/**
 * Module level model base class.
 */
class WidgetModel extends BaseModel
{
    /**
     * @var \Ufo\Core\Db
     */
    protected $db;
    
    /**
     * Get items data.
     * @return array
     */
    public function getItems(): array
    {
        $sql =  'SELECT *' . 
                ' FROM #__enikeishik_ufmexample_items' . 
                ' WHERE marked!=0' . 
                ' ORDER BY created_at DESC';
        return $this->db->getItems($sql);
    }
}
