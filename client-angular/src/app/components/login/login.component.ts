
import { Component, OnInit } from '@angular/core';
import { Router, ActivatedRoute, Params } from '@angular/router';
import { User } from './../../models/user';
import { UserService } from '../../services/user.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  providers: [UserService]
})
export class LoginComponent implements OnInit {
  public title: string;
  public user: User;
  public token;
  public identity;
  public status: string;

  constructor(private _userService: UserService, private _route: ActivatedRoute, private _router: Router) {
    this.title = 'Identificate';
    this.user = new User(1, 'ROLE_USER', '', '', '', '');
  }

  ngOnInit(): void {
    console.log('login.component cargado correctamente!!');

    this.logout();
  }

  onSubmit(form) {
    this._userService.singUp(this.user).subscribe(
      responseIdentity => {
        // Objeto usuario identificado
        if (responseIdentity.status != 'error') {
          this.status = 'success';
          this.identity = responseIdentity;
          localStorage.setItem('identity', JSON.stringify(this.identity));

          this._userService.singUp(this.user, true).subscribe(
            responseToken => {
              // Token
              this.token = responseToken;
              localStorage.setItem('token', this.token);

              // Redirección
              this._router.navigate(['home']);
            },
            error => {
              console.log(<any>error);
            }
          );
        } else {
          this.status = 'error';
        }
      },
      error => {
        console.log(<any>error);
      }
    );
  }

  logout() {
      this._route.params.subscribe(params => {
        let logout = +params['sure'];
        if (logout == 1) {
          localStorage.removeItem('identity');
          localStorage.removeItem('token');

          this.identity = null;
          this.token = null;

          // Redirección
          this._router.navigate(['home']);
        }
      });
  }

}
