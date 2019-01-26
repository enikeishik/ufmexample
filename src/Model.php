<?php
/**
 * UFO Framework Stub module.
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
class Model extends BaseModel
{
    /**
     * @var \Ufo\Core\Db
     */
    protected $db;
    
    /**
     * Some model method to make some action.
     * @return array
     */
    public function makeAction(): void
    {
        $sql =  'UPDATE #__enikeishik_ufmexample_items' . 
                ' SET marked=1, marked_at=NOW()' . 
                ' WHERE id=' . $this->params['itemId']->value;
        $this->db->query($sql);
    }
    
    /**
     * Get items data.
     * @return array
     */
    public function getItems(): array
    {
        $sql =  'SELECT *'
                ' FROM #__enikeishik_ufmexample_items' . 
                ' ORDER BY created_at DESC';
        return $this-db->getItems($sql);
    }
    
    /**
     * Get one item data.
     * @return ?array
     */
    public function getItem(): ?array
    {
        if (empty($this->params['itemId']->value)) {
            return null;
        }
        
        $sql =  'SELECT *'
                ' FROM #__enikeishik_ufmexample_items' . 
                ' WHERE id=' . $this->params['itemId']->value;
        return $this->db->getItem($sql);
    }
}
