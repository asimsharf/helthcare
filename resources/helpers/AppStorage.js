class AppStorage {
    storeToken(token) {
        localStorage.setItem("token", token);
    }

    storeUser(user) {
        localStorage.setItem("user", user);
    }

    store(user, token) {
        this.storeToken(token);
        this.storeUser(user);
    }

    clear() {
        localStorage.removeItem("token");
        localStorage.removeItem("user");
    }

    getToken() {
        return localStorage.getItem("token");
    }

    getUser() {
        return localStorage.getItem("user");
    }

    get() {
        return {
            token: this.getToken(),
            user: this.getUser(),
        };
    }

    hasToken() {
        const token = this.getToken();
        if (token) {
            return token;
        }
        return false;
    }

    hasUser() {
        const user = this.getUser();
        if (user) {
            return user;
        }
        return false;
    }

    has() {
        if (this.hasToken() && this.hasUser()) {
            return true;
        }
        return false;
    }

    loggedIn() {
        return this.has();
    }

    loggedOut() {
        return !this.has();
    }

    getAccessToken() {
        return this.getToken();
    }

    getAuthHeader() {
        return {
            Authorization: `Bearer ${this.getAccessToken()}`,
        };
    }
}

export default AppStorage = new AppStorage();
