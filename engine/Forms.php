<?php

class Forms
{
    public static function getForms()
    {
        $stmt = DB::getInstance()->prepare('SELECT `id`, `name`, `description` FROM `wp_frm_forms` WHERE `status` = "published"');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getFormFields($form)
    {
        $stmt = DB::getInstance()->prepare('SELECT `id`, `name`, `description`, `type`, `default_value`, `required` FROM `wp_frm_fields` WHERE `form_id` = ? ORDER BY `field_order` ASC');
        $stmt->execute(array($form));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}
