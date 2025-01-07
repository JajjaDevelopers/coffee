<?php
namespace App\Libraries;

use App\Models\RoleModel;
use App\Models\UserRoleModel;
use App\Models\PermissionModel;
use App\Models\RolePermissionModel;

/**
 * This class handles permissions that can be attached to roles
 * or users themselves
 */
class RolePermission 
{
    protected $roleModel;
    protected $permissionModel;
    protected $userRoleModel;
    protected $rolePermissionModel;

    public function __construct()
    {
        $this->roleModel = new RoleModel();
        $this->permissionModel = new PermissionModel();
        $this->userRoleModel = new UserRoleModel();
        $this->rolePermissionModel = new RolePermissionModel();
    }

    /**
     * Assign role to a user
     *
     * @param [type] $userId
     * @param [type] $roleId
     * @return void
     */
    public function assignRole($userId,$roleId)
    {
        $this->userRoleModel->save([
            'user_id' => $userId,
            'role_id' => $roleId
        ]);
    }

    /**
     * Detach role from a user
     *
     * @param [type] $userId
     * @param [type] $roleId
     * @return void
     */
    public function removeRole($userId, $roleId)
    {
        $this->userRoleModel->where('user_id', $userId)->where('role_id', $roleId)->delete();
    }

     // Assign permission to a role
     public function assignPermission($roleId, $permissionId)
     {
         $this->rolePermissionModel->save([
             'role_id' => $roleId,
             'permission_id' => $permissionId
         ]);
     }
 
     // Remove permission from a role
     public function removePermission($roleId, $permissionId)
     {
         $this->rolePermissionModel->where('role_id', $roleId)->where('permission_id', $permissionId)->delete();
     }
 
     /**
      * Check if a user has a specific role
      *
      * @param [type] $userId
      * @param [type] $roleName
      * @return boolean
      */
     public function hasRole($userId, $roleName)
     {
         $role = $this->roleModel->where('name', $roleName)->first();
         if (!$role) {
             return false;
         }
         
         $userRole = $this->userRoleModel->where('user_id', $userId)->where('role_id', $role['id'])->first();
         return $userRole ? true : false;
     }
 
     /**
      * Check if a user has a specific permission
      *
      * @param [type] $userId
      * @param [type] $permissionName
      * @return boolean
      */
     public function hasPermission($userId, $permissionName)
     {
         $permission = $this->permissionModel->where('name', $permissionName)->first();
         if (!$permission) {
             return false;
         }
 
         $roles = $this->userRoleModel->select('role_id')->where('user_id', $userId)->findAll();
         foreach ($roles as $role) {
             $rolePermissions = $this->rolePermissionModel->where('role_id', $role['role_id'])->findAll();
             foreach ($rolePermissions as $rolePermission) {
                 if ($rolePermission['permission_id'] === $permission['id']) {
                     return true;
                 }
             }
         }
 
         return false;
     }
 
     /**
      * Get all permissions of a user (from their roles)
      *
      * @param [type] $userId
      * @return void
      */
     public function getUserPermissions($userId)
     {
         $permissions = [];
         $roles = $this->userRoleModel->select('role_id')->where('user_id', $userId)->findAll();
         foreach ($roles as $role) {
             $rolePermissions = $this->rolePermissionModel->where('role_id', $role['role_id'])->findAll();
             foreach ($rolePermissions as $rolePermission) {
                 $permissions[] = $this->permissionModel->find($rolePermission['permission_id']);
             }
         }
         return $permissions;
     }
 
     /**
      * Get all user roles
      *
      * @param [type] $userId
      * @return void
      */
     public function getUserRoles($userId)
     {
         $roles = [];
         $userRoles = $this->userRoleModel->where('user_id', $userId)->findAll();
         foreach ($userRoles as $userRole) {
             $roles[] = $this->roleModel->find($userRole['role_id']);
         }
         return $roles;
     }
}
