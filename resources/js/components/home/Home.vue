<template>

    <div class="page-header">
        <h1 class="page-title">Home</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <router-link to="/home">Dashboard</router-link>
            </li>
            <li class="breadcrumb-item">
                <router-link to="/home">Home</router-link>
            </li>
            <li class="breadcrumb-item active">Home</li>
        </ol>

        <dev class="page-content">
            <div class="panel" style="background-color: #FFF">
                <header class="panel-heading">
                    <div class="panel-actions"></div>
                    <h3 class="panel-title">Basic</h3>
                </header>
                <div class="panel-body">
                    <table class="table table-hover dataTable table-striped w-full" data-plugin="dataTable">
                        <thead class="thead-dark" style="background-color: #FFF" role="row">
                            <tr role="row" class="text-center" style="background-color: #FFF">
                                <th>Doctor Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Certificate</th>
                                <th>Place of Study</th>
                                <th>Experience</th>
                                <th>IQama</th>
                                <th>Authority Card</th>
                                <th>Joing Date</th>

                            </tr>
                        </thead>
                        <tbody class="text-center" style="background-color: #FFF" role="rowgroup">
                            <tr v-for="doctor in bestDoctors" :key="doctor.id" @click="doctorProfile(doctor)" role="row"
                                class="odd" style="background-color: #FFF">
                                <td>{{ doctor.doctor.fname }} {{ doctor.doctor.lname }}</td>
                                <td>{{ doctor.doctor.email }}</td>
                                <td>{{ doctor.doctor.phone }}</td>
                                <td class="text-center" style="background-color: #FFF">
                                    <img :src="doctor.image" alt="" width="20" height="20" class="rounded-circle" />
                                </td>
                                <td>{{ doctor.place_of_study }}</td>
                                <td>{{ doctor.experience_years }} Years</td>
                                <th>{{ doctor.doctor.iqama }}</th>
                                <td class="text-center" style="background-color: #FFF">
                                    <img :src="doctor.authority_card" alt="" width="20" height="20"
                                        class="rounded-circle" />
                                </td>
                                <td>{{ doctor.created_at }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </dev>
    </div>
</template>


<script>

export default {
    name: 'Home',
    data() {
        return {
            bestDoctors: [],
        }
    },
    methods: {
        fetchBestDoctors() {
            axios.get('/api/v1/user/doctors/best-doctors?page=1')
                .then(res => {
                    if (res.data.code == 1) {
                        res.data.data.forEach(doctor => {
                            console.log(doctor)
                            this.bestDoctors.push(doctor)
                        })
                    } else {
                        console.log({
                            length: 'Best Doctors Length-> ' + this.bestDoctors.length,
                            message: 'Failed to fetch best doctors',
                        })
                    }
                })
                .catch(error => {
                    console.log(error)
                }).finally(() => {
                    console.log({
                        length: 'Best Doctors Length-> ' + this.bestDoctors.length,
                        message: 'Successfully fetched best doctors',
                    })
                })
        },
        doctorProfile(doctor) {
            this.bestDoctors.push(doctor)
        },


    },
    mounted() {
        this.fetchBestDoctors()
    },
}


</script>