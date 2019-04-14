<?php

namespace application\lib;

class Pagination
{
    private $max = 10;

    private $index;

    private $current_page;

    private $total;

    private $limit;

    public function __construct($total, $currentPage, $limit, $index)
    {
        # set count note
        $this->total = $total;

        # set count note on page
        $this->limit = $limit;

        # set key url
        $this->index = $index;

        # set count pages
        $this->amount = $this->amount();

        # set number current page
        $this->setCurrentPage($currentPage);
    }

    /**
     *  links navigation
     * 
     * @return HTML-with links navigation
     */
    public function get()
    {
        $links = null;

        # get limits for loop
        $limits = $this->limits();
        $html = '<div class="row justify-content-center"><div class="col-lg-6">';
        $html.= '<ul class="pagination">';

        # loop generate HTML links
        for ($page = $limits[0]; $page <= $limits[1]; $page++) 
        {
            # if on current page add class pagination__active 
            if ($page == $this->current_page) {
                $links .= '<li class="pagination__active"><a href="#">' . $page . '</a></li>';
            } else {
                # generate links
                $links.= $this->generateHtml($page);
            }
        }

        if (!is_null($links)) {
            
            if ($this->current_page > 1)
            # create link "to forward"
                $links = $this->generateHtml(1, '&lt;') . $links;

            if ($this->current_page < $this->amount)
            # create link "to end"
                $links .= $this->generateHtml($this->amount, '&gt;');
        }

        $html .= $links . '</ul></div></div>';

        return $html;
    }

    /**
     * generate HTML links
     * @param integer $page - number page
     * 
     * @return
     */
    private function generateHtml($page, $text = null)
    {

        # if empty $text
        if (!$text)
        # set $text - nubber page
        $text = $page;

        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/');
        
        $str="";

        #check GET params
        if($ex = explode('?',$currentURI))
        {
            $currentURI = $ex[0];

            $secondPart = $ex[1];
            
            $secondPart = explode('&', $secondPart);

            #delete 'page=[0-9]+'
            unset($secondPart[0]);

                foreach ($secondPart as $val) 
                {
                    $str.='&'.$val;
                }
                 # return HTML links
        return
                '<li><a href="'.$currentURI.'?'.$this->index.$page.$str.'">'.$text.' </a></li>';
        }
    }

    /**
     *  
     * 
     * @return array start/end
     */
    private function limits()
    {
        # active link center
        $left = $this->current_page - round($this->max / 2);

        # start navigation
        $start = $left > 0 ? $left : 1;

        if ($start + $this->max <= $this->amount)
        # send end of loop ahead on $this->max pages or minimum
            $end = $start > 1 ? $start + $this->max : $this->max;
        else {
            # end = count pages
            $end = $this->amount;
        }
        return
                array($start, $end);
    }

    /**
     * set current page
     * 
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        $this->current_page = $currentPage;

        if ($this->current_page > 0) 
        {
            if ($this->current_page > $this->amount)
           
                $this->current_page = $this->amount;
        } else
            $this->current_page = 1;
    }

    /**
     * 
     * @return count pages
     */
    private function amount()
    {
        $res = ceil($this->total / $this->limit);
        return $res; 
    }

}
