<?php
namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasAvatar
{
    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateAvatar(UploadedFile $photo)
    {
        tap($this->avatar_path, function ($previous) use ($photo) {
            $this->forceFill([
                'avatar_path' => $photo->storePublicly(
                    'avatars',
                    ['disk' => $this->avatarDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->avatarDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteAvatar()
    {
        Storage::disk($this->avatarDisk())->delete($this->avatar_path);

        $this->forceFill(['avatar_path' => null])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        return $this->avatar_path
                    ? Storage::disk($this->avatarDisk())->url($this->avatar_path)
                    : $this->defaultAvatarUrl();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultAvatarUrl()
    {
        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function avatarDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }
}
