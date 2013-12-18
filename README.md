yii-mycgridview
===============

A slightly customized version of the default CGridView widget

Customizations include:

- attribute $showHeaderWhenThereAreNoResults, default = false, set it to true if you want your grid to display a header even when there is no data to show;
- attribute $clickableRows, default = false, set it to true to make mouse cursor turn to a little hand over your grid rows);
- custom htmlOptions (removing some padding that doesn't look too good - good if you're using bootstrap);
- custom afterAjaxUpdate javascript function to reactivate bootstrap tooltips after an ajax update.
