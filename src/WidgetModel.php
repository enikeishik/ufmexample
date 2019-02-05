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
 * Widget model class.
 */
class WidgetModel extends BaseModel
{
    /**
     * @var \Ufo\Core\Db
     */
    protected $db;
    
    /**
     * Get items data.
     * @param string $filter = ''
     * @return array
     */
    public function getItems(string $filter = '', int $count = 3): array
    {
        $sqlFilter = '';
        if ('marked' == $filter) {
            $sqlFilter = ' WHERE marked!=0';
        } elseif ('unmarked' == $filter) {
            $sqlFilter = ' WHERE marked=0';
        }
        $sql =  'SELECT *' . 
                ' FROM #__enikeishik_ufmexample_items' . 
                $sqlFilter . 
                ' ORDER BY created_at DESC' . 
                ' LIMIT ' . $count;
        return $this->db->getItems($sql);
    }
}
