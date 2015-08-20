<div id="page-title">
    <a class="btn btn-primary btn-labeled fa fa-plus margined pull-right" href="<?php echo site_url("site/createfeedback"); ?>">Create</a>
    <h1 class="page-header text-overflow">feedback Details </h1>
</div>
<div id="page-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel drawchintantable">
                <?php $this->chintantable->createsearch("feedback List");?>
                <div class="fixed-table-container">
                    <div class="fixed-table-body">
                        <table class="table table-hover" id="" cellpadding="0" cellspacing="0">
                            <thead>
                                <tr>
                                    <th data-field="id">ID</th>
                                    <th data-field="name">Name</th>
                                    <th data-field="email">Email</th>
                                    <th data-field="feedback">Feedback</th>
                                    <th data-field="phone">Phone</th>
                                    <th data-field="address1">Address1</th>
                                    <th data-field="address2">Address2</th>
                                    <th data-field="city">City</th>
                                    <th data-field="country">Country</th>
                                    <th data-field="postcode">Postcode</th>
                                    <th data-field="Action">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-pagination" style="display: block;">
                        <div class="pull-left pagination-detail">
                            <?php $this->chintantable->createpagination();?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function drawtable(resultrow) {
            return "<tr><td>" + resultrow.id + "</td><td>" + resultrow.name + "</td><td>" + resultrow.email + "</td><td>" + resultrow.feedback + "</td><td>" + resultrow.phone + "</td><td>" + resultrow.address1 + "</td><td>" + resultrow.address2 + "</td><td>" + resultrow.city + "</td><td>" + resultrow.country + "</td><td>" + resultrow.postcode + "</td><td><a class='btn btn-primary btn-xs' href='<?php echo site_url('site/editfeedback?id=');?>" + resultrow.id + "'><i class='icon-pencil'></i></a><a class='btn btn-danger btn-xs' onclick=return confirm(\"Are you sure you want to delete?\") href='<?php echo site_url('site/deletefeedback?id='); ?>" + resultrow.id + "'><i class='icon-trash '></i></a></td></tr>";
        }
        generatejquery("<?php echo $base_url;?>");
    </script>
</div>
</div>
