<?php

/**
 * Slightly modified CGridView.
 *
 */
Yii::import('zii.widgets.grid.CGridView');

class MyCGridView extends CGridView {

    public $dp;
    public $nullDisplay = '<span style="color:pink;">Not Set</span>';
    public $htmlOptions = [
        'style' => 'padding-top:0px!important;padding-bottom:0px!important;'
    ];
    public $showHeaderWhenThereAreNoResults = false;

    public function renderSummary() {

        /**
         * 25/06/2013
         * 
         * modifications made in order to preserve the header even when there are no results.
         * */
        if (!$this->showHeaderWhenThereAreNoResults)
            if (($count = $this->dataProvider->getItemCount()) <= 0)
                return;

        $count = $this->dataProvider->getItemCount();

        echo '<div class="' . $this->summaryCssClass . '">';
        if ($this->enablePagination) {
            $pagination = $this->dataProvider->getPagination();
            $total = $this->dataProvider->getTotalItemCount();
            $start = $pagination->currentPage * $pagination->pageSize + 1;

            $end = $start + $count - 1;
            if ($total === '0')
                $start = $end = 0;

            if ($end > $total) {
                $end = $total;
                $start = $end - $count + 1;
            }
            if (($summaryText = $this->summaryText) === null)
                $summaryText = Yii::t('zii', 'Displaying {start}-{end} of 1 result.|Displaying {start}-{end} of {count} results.', $total);
            echo strtr($summaryText, array(
                '{start}' => $start,
                '{end}' => $end,
                '{count}' => $total,
                '{page}' => $pagination->currentPage + 1,
                '{pages}' => $pagination->pageCount,
            ));
        }
        else {
            if (($summaryText = $this->summaryText) === null)
                $summaryText = Yii::t('zii', 'Total 1 result.|Total {count} results.', $count);
            echo strtr($summaryText, array(
                '{count}' => $count,
                '{start}' => 1,
                '{end}' => $count,
                '{page}' => 1,
                '{pages}' => 1,
            ));
        }
        echo '</div>';
    }

}