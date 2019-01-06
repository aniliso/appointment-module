<?php

namespace Modules\Appointment\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;
use Modules\User\Contracts\Authentication;

class RegisterAppointmentSidebar extends AbstractAdminSidebar
{
    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('appointment::appointments.title.appointments'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                /* append */
                );
                $item->item(trans('appointment::appointments.title.appointments'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.appointment.appointment.create');
                    $item->route('admin.appointment.appointment.index');
                    $item->authorize(
                        $this->auth->hasAccess('appointment.appointments.index')
                    );
                });
// append

            });
        });
        return $menu;
    }
}
