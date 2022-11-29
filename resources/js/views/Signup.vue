<template>
    <div class="container">
        <div class="row justify-content-end align-items-start">
            <div class="col-sm-3 " id="backend-view">
                <form>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label"
                            >Email address</label
                        >
                        <input
                            type="email"
                            class="form-control"
                            id="InputEmail"
                            aria-describedby="emailHelp"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="InputPassword" class="form-label"
                            >Password</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="InputPassword1"
                        />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {};
</script>

<style>
.container {
 padding-right: 0;
 margin-right: 0;
}

#backend-view {
    height: 100vh;
    background-color: #f3f4f6;
    display: grid;
    align-items: center;
}
</style>
