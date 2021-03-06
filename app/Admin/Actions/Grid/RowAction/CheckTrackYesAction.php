<?php

namespace App\Admin\Actions\Grid\RowAction;

use App\Models\CheckTrack;
use Dcat\Admin\Actions\Response;
use Dcat\Admin\Admin;
use Dcat\Admin\Grid\RowAction;

class CheckTrackYesAction extends RowAction
{
    /**
     * @return string
     */
    protected $title = '🟢 盘盈';

    /**
     * Handle the action request.
     *
     * @return Response
     */
    public function handle()
    {
        if (!Admin::user()->can('check.track.yes')) {
            return $this->response()
                ->error('你没有权限执行此操作！')
                ->refresh();
        }

        $check_track = CheckTrack::where('id', $this->getKey())->first();
        if (empty($check_track)) {
            return $this->response()
                ->alert()
                ->error('没有找到此盘点追踪');
        } else {
            $check_track->status = 1;
            $check_track->checker = Admin::user()->id;
            $check_track->save();
            return $this->response()
                ->alert()
                ->success('已盘盈')
                ->refresh();
        }
    }
}
