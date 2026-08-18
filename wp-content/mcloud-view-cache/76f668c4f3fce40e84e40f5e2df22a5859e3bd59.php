<?php /** @var \MediaCloud\Plugin\Wizard\Config\Field $field */?>
<div class="form-field">
    <label for="<?php echo e($field->name()); ?>"><?php echo e($field->title()); ?></label>
    <input type="file" name="<?php echo e($field->name()); ?>" id="<?php echo e($field->name()); ?>" <?php echo e($field->required() ? 'required' : ''); ?>>
</div>
<?php /**PATH /var/www/html/wp-content/plugins/ilab-media-tools/views/wizard/steps/form-fields/upload.blade.php ENDPATH**/ ?>