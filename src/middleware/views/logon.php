<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

namespace middleware;

use strings;

?>

<form id="<?= $_form = strings::rand() ?>" method="post" autocomplete="off">
  <input type="hidden" name="action" value="logon">
  <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" id="<?= $_modal = strings::rand() ?>">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="<?= $_modal ?>Label">Logon</h5>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col mb-3">
              <input class="form-control" name="user" type="text" placeholder="username" required>
            </div>
          </div>

          <div class="row">
            <div class="col mb-3">
              <input class="form-control" name="pass" type="password" placeholder="password" required>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <div class="alert my-0 p-2"></div>
          <button type="submit" class="btn btn-primary ms-auto">Logon</button>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(() => {
      $.fn.serializeFormJSON = function() {

        let o = {};
        let a = this.serializeArray();
        $.each(a, (i, el) => {
          if (o[el.name]) {
            if (!o[el.name].push) o[el.name] = [o[el.name]];
            o[el.name].push(el.value || '');

          } else {
            o[el.name] = el.value || '';

          }

        });

        return o;

      };

      let el = document.getElementById('<?= $_modal ?>');
      el.addEventListener('shown.bs.modal', function(e) {
        $('#<?= $_form ?>')
          .on('submit', function(e) {
            let _form = $(this);
            let _data = _form.serializeFormJSON();

            $.post('/', _data)
              .then(d => JSON.parse(d))
              .then(d => {
                if ('ack' == String(d.response)) {
                  window.location.reload();
                } else {
                  // console.table(d);
                  $('.modal-footer > .alert', '#<?= $_modal ?>')
                    .html('invalid')
                    .addClass('alert-danger');

                }

              });

            // console.table(_data);

            return false;
          });
      });

      (new bootstrap.Modal(el, {})).show();

    });
  </script>
</form>
