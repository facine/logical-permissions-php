<?php

namespace Ordermind\LogicalPermissions\Interfaces;

interface LogicalPermissionsInterface {

  /**
  * Add a permission type.
  * @param string $name The name of the permission type.
  * @param callable $callback The callback that evaluates the permission type. Upon calling checkAccess() the registered callback will be passed two parameters: a $permission string (such as a role) and the $context object passed to checkAccess(). The permission will always be a single string even if for example multiple roles are accepted. In that case the callback will be called once for each role that is to be evaluated. The callback should return a boolean which determines whether access should be granted.
  */
  public function addType($name, $callback);

  /**
  * Remove a permission type.
  * @param string $name The name of the permission type.
  */
  public function removeType($name);
  
  /**
  * Checks whether a permission type is registered.
  * @param string $name The name of the permission type.
  * @return bool TRUE if the type is found or FALSE if the type isn't found.
  */
  public function typeExists($name);
  
  /**
  * Get the callback for a permission type.
  * @param string $name The name of the permission type.
  * @return callable Callback for the permission type.
  */
  public function getTypeCallback($name);
  
  /**
  * Get all defined permission types.
  * @return array Permission types with the structure ['name' => callback, 'name2' => callback2, ...].
  */
  public function getTypes();
  
  /**
  * Overwrite all defined permission types.
  * @param array $types Permission types with the structure ['name' => callback, 'name2' => callback2, ...].
  */
  public function setTypes($types);
  
  /**
  * Get the registered callback for access bypass evaluation.
  * @return callable Bypass access callback.
  */
  public function getBypassCallback();
  
  /**
  * Set the callback for access bypass evaluation.
  * @param callable $callback The callback that evaluates access bypassing. Upon calling checkAccess() the registered bypass callback will be passed one parameter, which is the $context object passed to checkAccess(). It should return a boolean which determines whether bypass access should be granted.
  */
  public function setBypassCallback($callback);
  
  /**
  * Check access for a permission tree.
  * @param array $permissions The permission tree to be evaluated.
  * @param array $context A context array that could for example contain the evaluated user and document.
  * @return bool Access.
  */
  public function checkAccess($permissions, $context);

}

