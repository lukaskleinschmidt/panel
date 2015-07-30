<?php

class AvatarsController extends Controller {

  public function upload($username) {

    $user = $this->user($username);

    try {
      $user->avatar()->upload();        
      $this->notify(':)');
    } catch(Exception $e) {
      $this->alert($e->getMessage());
    }

    $this->redirect($user);        

  }

  public function delete($username) {

    $self   = $this;
    $user   = $this->user($username);
    $avatar = $user->avatar();

    if(!$avatar->exists()) {
      return modal('error', array(
        'text' => 'This user has no avatar',
        'back' => $user->url()
      ));
    }

    $form = $avatar->form('delete', function($form) use($user, $avatar, $self) {

      try {
        $avatar->delete();        
        $self->notify(':)');
        $self->redirect($user);
      } catch(Exception $e) {
        $form->alert($e->getMessage());
      }

    });

    return modal('avatars/delete', compact('form'));

  }

}