<?php

namespace App\Repositories;

use App\Dtos\ActionHistoryDto;
use App\Models\ActionHistory;
use App\Repositories\Interfaces\IActionHistoryRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class ActionHistoryRepository implements IActionHistoryRepository
{
    public function all(): LengthAwarePaginator
    {
        return ActionHistory::paginate(10);
    }

    public function single(int $id): ActionHistory
    {
        return ActionHistory::findOrFail($id);
    }

    public function create(ActionHistoryDto $dto): ActionHistory
    {
        return ActionHistory::create([
            ActionHistory::STATUS => $dto->status,
            ActionHistory::MESSAGE => $dto->message,
            ActionHistory::LOG => $dto->log,
        ]);
    }

    public function delete(int $id): ActionHistory
    {
        try {
            $actionHistory = ActionHistory::findOrFail($id);

            if (!$actionHistory->delete()) {
                throw new BadRequestException('Delete action is not completed.');
            }

            return $actionHistory;
        } catch (ModelNotFoundException $e) {
            throw new BadRequestException("ActionHistory with id {$id} not found.");
        } catch (\Exception $e) {
            throw new BadRequestException('An unexpected error occurred while deleting the action history.');
        }
    }
}
