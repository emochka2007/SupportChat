<!-- Chat Room Password -->
<div class="modal fade" id="join_chat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Введите пароль</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form method="POST" action="confirm_password.php">
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Пароль:</span>
                            <input type="text" style="width:350px;" class="form-control" name="chat_pass" required>
                            <input type="hidden" id="chatid" name="chatid">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Отмена</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-check"></span> Подтвердить</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- Add Chat Room -->
<div class="modal fade" id="add_chatroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center>
                    <h4 class="modal-title" id="myModalLabel">Добавить новый чат</h4>
                </center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form>
                        <h1 style="font-size: 20px">При добавление чата указывайте в название компанию </h1>
                        <h5 style="font-size: 10px"><i>Пример: my_company_secret_chat</i></h5>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Название чата:</span>
                            <input type="text" style="width:350px;" class="form-control" id="chat_name" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:150px;">Пароль:</span>
                            <input type="text" style="width:350px;" class="form-control" id="chat_password">
                        </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Отмена</button>
                <button type="button" class="btn btn-primary" id="addchatroom"><span class="glyphicon glyphicon-check"></span> Добавить</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->