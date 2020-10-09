@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 chatBox">
            <div class="card">
                <div class="card-header">Chats</div>

                <div class="card-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage" 
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
        <div class="col-md-4 userView"> 
                <div class="card">
                    <div class="card-header"> Users </div>
                        <div class="card-body">
                            <user-list :users="users" :auth_user='@json($auth_user)'> </user-list>
                        </div>
                </div>
        </div>
    </div>
</div>

@endsection