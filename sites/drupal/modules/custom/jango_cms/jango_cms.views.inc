<?php
/**
 * Implements hook_views_data_alter().
 */
function jango_cms_views_data_alter(array &$data) {
  $data['node']['jango_cms_comment_count'] = [
    'title' => t('Jango CMS Comment count'),
    'field' => [
      'title' => t('Jango CMS Comment count'),
      'help' => t('Jango CMS Comment count instead standard Comment count.'),
      'id' => 'jango_cms_comment_count',
    ],
  ];
  $data['views']['jango_cms_entity_path'] = [
    'title' => t('Jango CMS Entity path'),
    'field' => [
      'title' => t('Jango CMS Entity path'),
      'help' => t('Jango CMS Entity path field.'),
      'id' => 'jango_cms_entity_path',
    ],
  ];
  $data['views']['jango_cms_single_image_url'] = [
    'title' => t('Jango CMS Single Image Url'),
    'field' => [
      'title' => t('Jango CMS Single Image Url'),
      'help' => t('Jango CMS Single Image field url.'),
      'id' => 'jango_cms_single_image_url',
    ],
  ];
  $data['views']['jango_cms_single_image_fid'] = [
    'title' => t('Jango CMS Single Image Fid'),
    'field' => [
      'title' => t('Jango CMS Single Image Fid'),
      'help' => t('Jango CMS Single Image field fid.'),
      'id' => 'jango_cms_single_image_fid',
    ],
  ];
  $data['views']['jango_cms_image_field_attributes'] = [
    'title' => t('Jango CMS Image Field Attributes'),
    'field' => [
      'title' => t('Jango CMS Image Field Attributes'),
      'help' => t('Use with image field, where "Display all values in the same row" setting is disable.'),
      'id' => 'jango_cms_image_field_attributes',
    ],
  ];
  $data['views']['jango_cms_user_access'] = [
    'title' => t('Jango CMS User Access'),
    'field' => [
      'title' => t('Jango CMS User Access'),
      'help' => t('Implements user_access().'),
      'id' => 'jango_cms_user_access',
    ],
  ];
}
