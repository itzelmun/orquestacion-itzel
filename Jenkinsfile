pipeline {
        environment {
            dockerimagename1 = "itzelmunguia/proyecto:itz"
            dockerimagename2 = "itzelmunguia/phpmyadmin:itz"
            dockerImage1 = ""
            dockerImage2= ""
            SONAR_SCANNER_HOME = "/opt/sonar-scanner"
            PATH = "${env.SONAR_SCANNER_HOME}/bin:${env.PATH}"
        }

    agent any

        stages {

            stage('Checkout Source') {
                steps {
                    git credentialsId: 'github_credential', url: 'https://github.com/itzelmun/orquestacion-itzel.git', branch:'main'
                }
            }

            stage('Static Code Analysis') {
                steps {
                    withSonarQubeEnv('sonarqube') {
                        sh "${env.SONAR_SCANNER_HOME}/bin/sonar-scanner \
                        -Dsonar.projectKey=proyecto \
                        -Dsonar.projectName=proyecto \
                        -Dsonar.projectVersion=1.0 \
                        -Dsonar.sources=proyecto \
                        -Dsonar.language=php \
                        -Dsonar.login=${sonarqubeGlobal} \
                        -Dsonar.host.url=http://scanner.ucol.mx:9000 \
                        -Dsonar.report.export.path=sonar-report.json"
                    }
                }
            }


            stage('Build image app') {
                steps{
                    dir('proyecto') {
                        script {
                            dockerImage1 = docker.build dockerimagename1
                        }
                    }
                    dir('phpmyadmin') {
                        script {
                            dockerImage2 = docker.build dockerimagename2 
                        }
                    }
                }
            }   


            stage('Pushing Image app') {
                environment {
                    registryCredential = 'dockerhubitz'
                }

                steps{
                    dir('proyecto') {
                        script {
                            docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
                                dockerImage1.push("itz")
                            }
                        }
                    }

                    dir('phpmyadmin'){
                        script {
                            docker.withRegistry( 'https://registry.hub.docker.com', registryCredential ) {
                                dockerImage2.push("itz")
                            }
                        }
                    }
                }
            }

                steps{
                    sshagent(['sshsanchez']){
                        sh 'cd proyecto && scp -r -o StrictHostKeyChecking=no deployment.yaml digesetuser@148.213.1.131:/home/digesetuser/'

                        script{
                            try{
                                sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment.yaml -n nsitzel --kubeconfig=/home/digesetuser/.kube/config'
                                sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment proyecto-itzel -n nsitzel --kubeconfig=/home/digesetuser/.kube/config'
                                //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment proyecto-itzel -n snitzel --kubeconfig=/home/digesetuser/.kube/config'
                            }catch(error){}
                        }


                            sh 'cd mysql && scp -r -o StrictHostKeyChecking=no deployment.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                        script{
                            try{
                                sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment.yaml -n nsitzel --kubeconfig=/home/digesetuser/.kube/config'
                                sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment mysql-deploy-itzel -n nsitzel --kubeconfig=/home/digesetuser/.kube/config'
                                //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment mysql-deploy-itzel --kubeconfig=/home/digesetuser/.kube/config'
                            }catch(error){}
                        }

                            sh 'cd phpmyadmin && scp -r -o StrictHostKeyChecking=no deployment.yaml digesetuser@148.213.1.131:/home/digesetuser/'
                        script{
                            try{
                                sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl apply -f deployment.yaml -n nsitzel --kubeconfig=/home/digesetuser/.kube/config'
                                sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout restart deployment adminitzel -n nsitzel --kubeconfig=/home/digesetuser/.kube/config'
                                //sh 'ssh digesetuser@148.213.1.131 microk8s.kubectl rollout status deployment adminitzel -n nsitzel --kubeconfig=/home/digesetuser/.kube/config'
                            }catch(error){}
                        }

                    }
                }

        }
    
            post{
                success{
                    slackSend channel: 'sanchez', color: 'good', failOnError: true, message: "${custom_msg()}", teamDomain: 'universidadde-bea3869', tokenCredentialId: 'slackpass'
                }
            }


}

    def custom_msg(){
        def JENKINS_URL= "jarvis.ucol.mx:8080"
        def JOB_NAME = env.JOB_NAME
        def BUILD_ID= env.BUILD_ID
        def JENKINS_LOG= " DEPLOY LOG: Job [${env.JOB_NAME}] Logs path: ${JENKINS_URL}/job/${JOB_NAME}/${BUILD_ID}/consoleText"
        return JENKINS_LOG
    }
