<?php
/**
 * UFO Framework Example module.
 * 
 * @copyright   Copyright (C) 2018 - 2019 Enikeishik <enikeishik@gmail.com>. All rights reserved.
 * @author      Enikeishik <enikeishik@gmail.com>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Ufo\Modules\Enikeishik\Ufmexample;

/**
 * Widget model class.
 */
class WidgetRtextModel implements \Ufo\Modules\ModelInterface
{
    protected $texts = [
        'Some first text', 
        'Some 2nd text', 
        'Another (3rd) text', 
    ];
    
    protected $textsCount = 0;
    
    public function __construct()
    {
        $this->textsCount = count($this->texts);
    }
    
    /**
     * @return string
     */
    public function getRandomText(): string
    {
        return $this->texts[rand(0, $this->textsCount - 1)];
    }
}
